export default {
    state: {
        items: {
            data: []
        },

    },
    mutations : {
        LOAD_CATEGORIES(state, categories){
            state.items = categories

        }
    },
    actions: {
        loadCategories (context){
            context.commit('PRELOADER', true)
            axios.get('/api/categoria')
                .then(response => {
                    console.log(response)
                    //this.categories = response
                    context.commit('LOAD_CATEGORIES', response)
                })
                .catch(errors => {
                    console.log(errors)
                })
                .finally(() => context.commit('PRELOADER', false))
        }

    },
    getters: {

    }


}
