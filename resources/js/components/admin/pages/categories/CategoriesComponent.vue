<template>
    <div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th width="100">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(category, index) in categories.data" :key="index">
                    <td>{{category.id}}</td>
                    <td v-text="category.nome"></td>
                    <td>....</td>
                    <td>....</td>
                </tr>
            </tbody>

        </table>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    created (){
        this.loadCategories()
    },
    data() {
        return {
            //categories: [],
            categories: {
                data: []

            },
        }
    },
    methods: {
        loadCategories(){
            axios.get('/api/categoria')
                .then(response => {
                    console.log(response)
                    this.categories = response
                })
                .catch(errors => {
                    console.log(errors)
                })

        }
    },

}
</script>

<style scoped>

</style>
