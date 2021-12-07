<template>
    <div>
        <h1>Editar Categoria</h1>

          <form class="form" @submit.prevent="submitForm">
            <div class="form-group">
                <input type="text" v-model="category.name" class="form-control" placeholder="Nome da Categoria">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>


    </div>
</template>

<script>
export default {
    props:{
        id: {
            require: true
        }
    },

    created() {
        this.$store.dispatch('loadCategory', this.id)
                .then(response => this.category = response)
                .catch(error => {
                    console.log(error)
                })
    },
    data() {
        return {
            category:{
                name: ''
            }
        }
    },

}
</script>

<style scoped>

</style>
