<script setup>

import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <music-layout>
        <template #title>
            Api
        </template>
        <template #action>
            <Link :href="route('apiKeys.create')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                ajouter une Api
            </Link>
        </template>
        <template #content>
            <table class=" table">
                <thead>
                <tr v-for="(api, i) in apis" key="apis.uuid">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{api.title}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{api.key}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{api.created_at}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{api.updated_at}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <Link :href="route('apiKeys.edit', api.uuid)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            modifier
                        </Link>
                    </th>
                </tr>
                </thead>
            </table>
        </template>


    </music-layout>
</template>

<style scoped>

</style>
