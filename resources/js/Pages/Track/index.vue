<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";

export default {
    name: 'TrackView',
    components: {MusicLayout},
    props:{
        tracks:Array,

    },

}

</script>

<template>
    <music-layout>music-layout>
        <template #content>
            <div>
                <ul >
                    <li v-for="(track) in tracks" :key="track.uuid" :class="[track.id % 2 ? 'text-red-500' : 'text-green-400']" >
                        <div>
                            <h3>
                                {{track.title}}
                            </h3>
                            <p>
                                {{track.artist}}
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </template>
    </music-layout>
</template>

<style scoped>
    ul{
        list-style: none;
        padding: 0;
    }
    li{
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding: 10px;
    }
    li:hover{
        background: #eee;
        cursor: pointer;
    }
    h3{
        margin: 0;
    }
    p{
        margin: 0;
    }



</style>
