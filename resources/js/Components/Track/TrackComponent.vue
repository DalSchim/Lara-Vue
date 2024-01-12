<script>
import {Link} from '@inertiajs/vue3'
import {Icon} from "@iconify/vue";


export default {
    name: "TrackComponent",
    emits: ['played'],
    props: {
        track: Object,
        active: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        router() {
            return router
        },
        player() {
            this.$emit('played', this.track)
        }
    },
    components: {
        Icon,
        Link,
    },


}


</script>

<template>
    <li>
        <div class="music-card" :class="{'border border-blue-500':active}" @click="player">
            <img :src="'/storage/' + track.image" alt="">
            <div>
                <h4>
                    {{ track.title }}
                </h4>
                <p>
                    {{ track.artist }}
                </p>
                <div class="tool-bouton">
                    <button class="edit">
                        <Link :href="route('tracks.edit',{track:track})">
                            <icon class="icon w-8 h-8 " icon="bi:pencil-square"/>
                        </Link>
                    </button>
                    <bouton class="suprimer" v-if="$page.props.isAdmin">
                        <Link :href="route('tracks.destroy',{track:track})" as="button" method="delete">
                            <icon class="icon w-8 h-8" icon="bi:trash-fill"/>
                        </Link>
                    </bouton>
                </div>
            </div>
        </div>
    </li>
</template>

<style scoped>

.music-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: #fff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
}

.music-card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.music-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.music-card h4 {
    margin: 1rem;
    font-size: 1.5rem;
}

.music-card p {
    margin: 1rem;
    font-size: 1.2rem;
    color: #777;
}

.music-card .edit {
    background-color: #fff;
    border: none;
    outline: none;
    cursor: pointer;
}

.music-card .edit:hover {
    color: #8cc0eb;
}

.music-card .suprimer {
    background-color: #fff;
    border: none;
    outline: none;
    cursor: pointer;
}

.music-card .suprimer:hover {
    color: #8cc0eb;
}

.tool-bouton {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1rem;
}


</style>
