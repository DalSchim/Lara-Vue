<script>

import MusicLayout from "@/Layouts/MusicLayout.vue";


export default {
    components: {
        MusicLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('apiKeys.store'))

        }
    },
}
</script>

<template>
    <music-layout>
        <template #title>
            Crée une clé: Api
        </template>
        <template #action>


        </template>

        <template #content>
            <form @submit.prevent="submit">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Nom de la clé APi
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

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="key">
                        Clé Api
                    </label>
                    <input type="submit"
                           class="shadow appearance-none border rounded w-full py-2 px-3
                             text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           value="Créer">
                </div>
            </form>
        </template>


    </music-layout>
</template>

<style scoped>

</style>
