<script>
import { RouterLink, RouterView } from "vue-router";
import Header from "./components/Header.vue";
import Main from "./components/Main.vue";
import Footer from "./components/Footer.vue";
export default {
    name: "App",

    components: {
        Header,
        Main,
        Footer,
    },
};
</script>

<template>
    <Header />
    <Main />
    <Footer />
</template>

<style lang="scss" scoped>
nav {
    width: 100%;
    font-size: 12px;
    margin-top: 2rem;

    a {
        margin: 2rem;
    }
}
</style>
