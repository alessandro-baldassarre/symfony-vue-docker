<script setup></script>

<template>
    <main>
        <div class="main-home d-flex justify-content-center align-items-center">
            <div class="main-title">
                <h1>Mercurio</h1>
                <span class="content-title">content</span>
                <span class="connect-title">connect</span>
                <span class="like-title">like</span>
                <span class="share-title">share</span>
                <span class="web-title">web</span>
                <span class="links-title">links</span>
            </div>
        </div>
    </main>
</template>

<style lang="scss" scoped>
div.main-home {
    height: 84.9vh;
    div.main-title {
        font-family: "Blaka", cursive;
        text-transform: uppercase;
        color: white;
        position: relative;
        h1 {
            font-size: 6rem;
            animation: title-load 400ms ease-in;
        }

        span {
            font-size: 2rem;
            position: absolute;
        }
        span.content-title {
            top: 40px;
            left: -140px;
            animation: left-load 1600ms ease-in;
        }
        span.connect-title {
            top: -30px;
            left: 100px;
            animation: left-load 1600ms ease-in;
        }
        span.links-title {
            bottom: -30px;
            left: 100px;
            animation: left-load 1600ms ease-in;
        }
        span.web-title {
            bottom: -30px;
            left: 280px;
            animation: right-load 1600ms ease-in;
        }
        span.share-title {
            top: 40px;
            right: -110px;
            animation: right-load 1600ms ease-in;
        }
        span.like-title {
            top: -30px;
            left: 280px;
            animation: right-load 1600ms ease-in;
        }
    }
}

@keyframes title-load {
    0% {
        transform: translateX(-300%);
    }
    100% {
        transform: translateX(0);
    }
}

@keyframes right-load {
    0% {
        transform: translateX(1000%);
    }
    100% {
        transform: translateX(0);
    }
}

@keyframes left-load {
    0% {
        transform: translateX(-1000%);
    }
    100% {
        transform: translateX(0);
    }
}
</style>
