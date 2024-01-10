<script>
export default {
    name: "TrackComponent",
    emits: ['played'],
    props: {
        track: Object,
        active: {
            type: Boolean,
            default: false,
        }
    },
    methods: {
        player() {
            this.$emit('played', this.track)
        }
    }


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

</style>
