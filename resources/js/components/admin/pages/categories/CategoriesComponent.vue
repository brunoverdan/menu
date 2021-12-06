<template>
    <div>
        <h1>Listagem des Categorias</h1>
        <router-link :to="{nome: 'admin.categories.create'}" class="btn btn-success">Cadastrar</router-link>
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
        this.$store.dispatch('loadCategories')
    },

   computed: {
       categories () {

           return this.$store.state.categories.items

       }
   }
}
</script>

<style scoped>

</style>
