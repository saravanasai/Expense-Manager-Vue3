import { reactive, toRefs } from "vue"
import api from "../../../config"

export default function useExpense() {

    const url = "/user/expense"

    const state = reactive({
        expenses: {},
        paginationData: {},
        isLoadingExpense:true
    })

    const getExpense = (id,page=1) => {


        api.get(url+'?page='+page+'&&bookId='+id)
            .then(e => {

            state.expenses = e.data.data
            state.paginationData = e.data
            state.isLoadingExpense = false

        })
    }



    const addExpense = data => {
        state.isLoadingExpense = true
        return api.post(url, data)
    }


    return {...toRefs(state),getExpense,addExpense}
}
