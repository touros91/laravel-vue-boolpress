<template>
    <header class="d-flex">
        <router-link :to="{ name: 'home' }">Home</router-link>
        <router-link :to="{ name: 'about' }">Chi Siamo</router-link>
        <router-link :to="{ name: 'contact' }">Contatti</router-link>
    </header>
</template>

<script>

export default {
    name: 'Header',
}
</script>