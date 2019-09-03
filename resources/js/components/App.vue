<template>
    <div>
        <nexus-nav></nexus-nav>
        <div class="p-y-8 p-x-6">
            <h2 class="bg-blue-500">Hello from App</h2>
        </div>

        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'nexus',
        components: {
            NexusNav: () => import('./Nav')
        }
    }
</script>

<style lang="scss" scoped>

</style>