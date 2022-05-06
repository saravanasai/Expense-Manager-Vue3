import { reactive, toRefs } from "vue"
import api from "../../../config"

export default function useExpense() {

    const url = "/user/expense"

    const state = reactive({
        expenses: {},
        isLoading:true
    })

    const getExpense = () => {

        api.get(url)
            .then(e => {

            state.expenses = e.data.data
            state.isLoading = false

        })
    }

    return {...toRefs(state),getExpense}
}
