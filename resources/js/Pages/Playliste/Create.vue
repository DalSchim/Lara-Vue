<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
export default {
    components:{
        MusicLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                tracks:[],
            }),
        }
    },
    props: {
        tracks: Array,
    },
    methods: {
        submit() {
            this.form.post(route('playlists.store'))
        }
    },

}
</script>

<template>

    <MusicLayout>
        <template #title>
            Créer une musique
        </template>

        <template #action>
            <Link
                :href="route('playlists.index')">
                Retour
            </Link>
        </template>

        <template #content>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Titre
                    </label>
                    <input
                        id="title"
                        v-model="form.title"
                        class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.title }"
                        type="text"
                        placeholder="Title"
                    >

                    {{ form }}
                </div>
                <input type="submit"
                       class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-100 leading-tight focus:outline-none focus:shadow-outline bg-blue-700"
                       a
                >
                <div v-for="track in tracks" key="track.uuid" >
                    <input type="checkbox" :value="track.uuid" v-model="form.tracks" class="">
                    <label :for="track.uuid">
                        {{ track.title }}
                    </label>
                </div>
            </form>

        </template>
    </MusicLayout>
</template>

<style scoped>

</style>
