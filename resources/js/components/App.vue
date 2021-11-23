<template>
    <div id="app">
        <Header/>
        <main>
            <router-view></router-view>
        </main>
        <Footer/>
    </div>
</template>

<script>
import Header from './Header';
import Footer from './Footer';

export default {
    name: 'App',
    components: {
        Header,
        Footer
    }
}
</script>

<style lang="scss">
   
</style>