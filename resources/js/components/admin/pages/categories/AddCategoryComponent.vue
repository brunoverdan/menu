<template>
    <div>
        <h1>
            Adicionar Nova Categoria
        </h1>
        <form class="form" @submit.prevent="submitForm">
            <div class="form-group">
                <input type="text" v-model="nome" class="form-control" placeholder="Nome da Categoria">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

    </div>
</template>

<script>
export default {
    data() {
        return {
            nome: ''
        }
    },
    methods: {
        submitForm(){
            this.$store.dispatch('storeCategory', {nome: this.nome})
        }
    },

}
</script>

<style scoped>

</style>
