import axios from "axios"

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
        },

        loadCategory (context, id){

            return new Promise((resolve, reject) => {

                context.commit('PRELOADER', true)

                axios.get(`/api/categoria/${id}`)
                    .then(response => resolve(response.data))
                    .catch(error => reject(error))
                    .finally(() => context.commit('PRELOADER', false))

            })

        },

        storeCategory(context, params) {

            context.commit('PRELOADER', true)

            return new Promise((resolve, reject) => {

                axios.post('/api/categoria', params)
                    .then(response => resolve())
                    .catch(error => reject(error))
                    .finally(() => context.commit('PRELOADER', false))

            })

        },

        updateCategory (context, params){

            return new Promise((resolve, reject) => {

                axios.put(`/api/categoria/${params.id}`, params)
                    .then(response => resolve())
                    .catch(error => reject(error))
                    .finally(() => context.commit('PRELOADER', false))

            })

        }

    },
    getters: {

    }


}
