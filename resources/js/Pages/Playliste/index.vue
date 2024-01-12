<script>

import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";
export default {
    name: "PlaylisteIndex",
    components: {
        MusicLayout,
        Link,
    },
    props: {
        playlists: Array,
    },
    data() {
        return {
            search: '',
        }
    },
    computed: {
        filteredPlaylistes() {
            return this.playlistes.filter((playliste) => {
                return playliste.title.toLowerCase().includes(this.search.toLowerCase())
            })
        },
    },
    methods: {
        play(track) {
            if (this.audio) {
                this.audio.pause()
            }
            this.audio = new Audio('/storage/' + track.file)
            this.audio.play()
            this.curentTrack = track.uuid
        },

        pause() {
            this.audio.pause()
        }

    },
}

</script>

<template>
    <music-layout>
        <template #title>
            playliste
        </template>

        <template #action>
            <Link :href="route('playlists.create')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                ajouter une playliste
            </Link>
        </template>

        <template #content>
            <table class=" table">
                <thead>
                <tr v-for="(playlist, i) in playlists" key="playlists.uuid">
                    <th>{{ i+1 }}</th>
                    <th>{{ playlist.title }}</th>
                    <th>{{ playlist.tracks_count}}</th>
                    <th>{{ playlist.created_at }}</th>
                    <th>
                       {{$moment(playlist.created_at).format('DD/MM/YYYY')}}
                    </th>
                    <dd>
                        <Link :href="route('playlists.show', playlist.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Voir
                        </Link>
                    </dd>

                </tr>
                </thead>
            </table>
        </template>

    </music-layout>



</template>

<style scoped>

    .table{
        width: 100%;
        border-collapse: collapse;

        thead{
            background-color: #f1f1f1;

            tr{
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 12px;

                border: 1px solid #ddd;
                th{
                    padding: 10px;
                    text-align: left;
                }
            }

        }
    }


</style>
