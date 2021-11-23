<template>
    <header class="d-flex">
        <router-link :to="{ name: 'home' }">Home</router-link>
        <router-link :to="{ name: 'about' }" class="router-link">Chi Siamo</router-link>
        <router-link :to="{ name: 'contact' }">Contatti</router-link>
    </header>
</template>

<script>

export default {
    name: 'Header',
}
</script>

<style lang="scss">
    header {
        padding: 10px;
        .router-link {
            margin: 0 20px;
        }
    }
</style>