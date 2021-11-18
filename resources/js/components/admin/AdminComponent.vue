<template>
    <div>
        <ul>
            <li>
                <router-link :to="{name: 'admin.dashboard'}">Dashboard</router-link>
            </li>
            <li>
                <router-link :to="{name: 'admin.categories'}">Categoria ({{totalCategories}})</router-link>
            </li>
        </ul>

        <router-view></router-view>
    </div>
</template>

<script>
export default {
    computed: {
        totalCategories (){
            return this.$store.state.categories.items.data.lenght
        }
    }
}
</script>

<style scoped>

</style>
