<template>

    <MusicLayout>
        <template #title>
            Musique
        </template>

        <template #action>
            <Link
                v-if="$page.props.isAdmin"
                :href="route('tracks.create')">
                Créer une Musique
            </Link>
        </template>

        <template #content>
            <input type="search" v-model="search">

            <div>
                <ul class="card-grid">
                    <track-component v-for="track in filteredTracks" :key="track.uuid" :track="track" :active="curentTrack == track.uuid" @played=play />
                </ul>
            </div>
            <div class="player">

            </div>
        </template>

    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import {Link} from '@inertiajs/vue3'
import {Icon} from "@iconify/vue";
import TrackComponent from "@/Components/Track/TrackComponent.vue";

export default {
    name: "TrackIndex",
    components: {
        TrackComponent,
        Icon,
        MusicLayout,
        Link,
    },
    props: {
        tracks: Array,

    },
    data() {
        return {
            search: '',
            audio: null,
            curentTrack: null,
        }

    },
    computed: {
        filteredTracks() {
            return this.tracks.filter((track) => {
                return track.title.toLowerCase().includes(this.search.toLowerCase())
                    || track.artist.toLowerCase().includes(this.search.toLowerCase())
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


<style scoped lang="scss">
body{
    margin-bottom: 70px;
}
.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-gap: 1rem;
    list-style: none;
    padding: 0;
}

.player {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #fff;
    padding: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    gap: 1rem;

   .icon {
        font-size: 2rem;
        margin: 0 1rem;
        cursor: pointer;
       &:hover {
            color:orangered;
        }
    }
}


</style>
