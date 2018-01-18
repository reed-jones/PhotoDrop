<template>
    <a class="wedding-photo gallery" :href="'/img/' + image + '?w=1920&h=1080&fit=max&fm=jpg&q=82'" :style="'background-image: url(/img/' + image + '?w=50&h=50&fit=crop&blur=15&fm=jpg&q=50)'">
        <clazy-load :src="'/img/' + image + '?w=400&h=400&fit=crop&fm=jpg&q=80'">
            <transition name='fade' slot="image">
                <img :src="'/img/' + image + '?w=400&h=400&fit=crop&fm=jpg&q=80'">
            </transition>
            <transition name='fade' slot='placeholder'>
                <div class="preloader ">
                    <img :src=" '/img/' + image + '?w=50&h=50&fit=crop&blur=15&fm=jpg&q=50' ">
                    <div>Loading...</div>
                </div>
            </transition>
        </clazy-load>
    </a>
</template>

<script>
export default {
    props: [
        'image'
    ]
}
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity .75s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.wedding-photo,
.preloader {
    width: 100vw;
    /* height: 100%; */
    height: 300px;
    /* min-width: 200px; */
}

.wedding-photo {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
}

.preloader {
    position: relative;
    display: flex;
    flex-flow: row wrap;
    align-items: center;
    justify-content: center;
}

.preloader img {
    width: 100%;
    height: 100%;
}

.loaded {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.loaded>img.fade-enter-active {
    /* opacity: 1; */
    z-index: 10000;
    position: absolute;
    top: 0;
}

.preloader>div {
    position: absolute;
    text-align: center;
    top: 35%;
    right: 0;
    bottom: 0;
    left: 0;
    font-weight: 600;
    color: #eee;
    text-shadow: 0 0 15px #000;
    font-size: 48px;
    z-index: 100;
}

.wedding-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
}

@media screen and (min-width: 400px) {
    .wedding-photo,
    .wedding-photo img,
    .preloader {
        width: 400px;
        height: 400px;
    }
}
</style>