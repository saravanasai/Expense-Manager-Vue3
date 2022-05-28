import { reactive, toRefs } from "vue"
import api from "../../../config"

export default function useExpense() {

    const url = "/user/expense"

    const state = reactive({
        expenses: {},
        isLoadingExpense:true
    })

    const getExpense = () => {

        api.get(url)
            .then(e => {

            state.expenses = e.data.data
            state.isLoadingExpense = false

        })
    }



    const addExpense = data => {
        state.isLoadingExpense = true
        return api.post(url, data)
    }


    return {...toRefs(state),getExpense,addExpense}
}
