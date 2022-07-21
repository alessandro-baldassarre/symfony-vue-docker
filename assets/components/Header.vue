<script>
import axios from "axios"

export default {
    data() {
        return {
            userInfo: null,
        }
    },
    methods: {
        getUserInfo() {
            axios
                .get("/api/userinfo")
                .then((response) => {
                    console.log(response)
                    this.userInfo = response.data
                    console.log(this.userInfo)
                })
                .catch((e) => {
                    console.log(e)
                    this.userInfo = null
                    console.log(this.userInfo)
                })
        },
    },

    // `mounted` is a lifecycle hook which we will explain later
    mounted() {
        this.getUserInfo()
    },
}
</script>

<template>
    <!-- <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink> -->
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
            >
                <!-- <a
                    href="/"
                    class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
                >
                    <svg
                        class="bi me-2"
                        width="40"
                        height="32"
                        role="img"
                        aria-label="Bootstrap"
                    >
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a> -->

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <router-link to="/" class="nav-link px-2 text-white">Home</router-link>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-2 text-white">Features</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-2 text-white">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-2 text-white">FAQs</a>
                    </li>
                    <li>
                        <router-link to="/about" class="nav-link px-2 text-white"
                            >About</router-link
                        >
                    </li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input
                        type="search"
                        class="form-control form-control-dark"
                        placeholder="Search..."
                        aria-label="Search"
                    />
                </form>

                <div class="text-end">
                    <span v-if="!userInfo"
                        ><a href="/login" class="btn btn-outline-light me-2">Login</a></span
                    >
                    <span v-else>
                        <a href="/logout" class="btn btn-outline-light me-2">Logout</a></span
                    >
                    <a href="/register" class="btn btn-warning">Sign-up</a>
                </div>
            </div>
        </div>
    </header>
</template>

<style></style>
