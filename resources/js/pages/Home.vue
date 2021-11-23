<template>
     <div>
        <h3>All Posts</h3>
        <ul>
            <li v-for="post in posts" :key="post.id">{{post.title}}</li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'Home'
}
</script>