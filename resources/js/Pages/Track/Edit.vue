<template>

    <MusicLayout>
        <template #title>
            Créer une musique
            modifier une music {{track.title}}
        </template>

        <template #action>
            <Link
                :href="route('tracks.index')">
                Retour
            </Link>
        </template>

        <template #content>
            <form @submit.prevent="submit">
                <label for="">Titre</label>
                <input
                    v-model="form.title"
                    id="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :class="{ 'border-red-500': form.errors.title}"
                    type="text"
                    placeholder="Title"
                >
                <label for="">Artiste</label>
                <input
                    v-model="form.artist"
                    id="artist"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :class="{ 'border-red-500': form.errors.artist}"
                    type="text"
                    placeholder="Artist"
                >
                <label for="">display</label>
                <br>
                <input
                    v-model="form.display"
                    id="disabled"
                    class="shadow appearance-none border rounded w-8 h-8 py-2 px-3 text-gray-700 m-2 leading-tight focus:outline-none focus:shadow-outline"
                    :class="{ 'border-red-500': form.errors.disabled}"
                    type="checkbox"
                    placeholder="Disabled"
                >
                <br>
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Créer
                </button>
                <br>
                <template v-if="form.errors.title">
                    <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
                </template>
                <template v-if="form.errors.artist">
                    <p class="text-red-500 text-xs italic">{{ form.errors.artist }}</p>
                </template>
                <template v-if="form.errors.image">
                    <p class="text-red-500 text-xs italic">{{ form.errors.image }}</p>
                </template>
                <template v-if="form.errors.music">
                    <p class="text-red-500 text-xs italic">{{ form.errors.music }}</p>
                </template>
                <template v-if="form.recentlySuccessful">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                         role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">Your track has been created.</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg @click="form.reset()" class="fill-current h-6 w-6 text-green-500" role="button"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 5.652a1 1 0 010 1.414L7.414 13l6.934 6.934a1 1 0 11-1.414 1.414L6 14.414l-6.934 6.934a1 1 0 11-1.414-1.414L4.586 13 .652 6.066a1 1 0 111.414-1.414L6 11.586l6.934-6.934a1 1 0 011.414 0z"/>
                        </svg>
                    </span>
                    </div>
                </template>
                {{ form }}
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import {Link} from '@inertiajs/vue3'

export default {
    components: {
        MusicLayout,
    },
    props: {
        track: Object,
    },
    data() {
        return {
            //test: '',
            form: this.$inertia.form({
                title: this.track.title,
                artist: this.track.artist,
                display: this.track.display ? true : false,
            }),
        }
    },
    methods: {
        submit() {
            this.form.put(route('tracks.update', {track: this.track}))
        }
    }
}
</script>


<style scoped>
ul {
    list-style: none;
    padding: 0;
}

li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ccc;
    padding: 10px;
}

li:hover {
    background: #8cc0eb;
    color: white;
    cursor: pointer;
}

h3 {
    margin: 0;
}

p {
    margin: 0;
}
</style>
