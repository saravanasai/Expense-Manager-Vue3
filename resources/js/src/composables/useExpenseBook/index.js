import { reactive, toRefs } from "vue"
import api from "../../../config"


export default function useExpenseBook()
{

    const url = "/user/expense-book"

    const state = reactive({
        expenseBooks: {},
        isLoading:true
    })

    const getExpenseBooks = () => {

        api.get(url)
            .then(e => {

            state.expenseBooks = e.data.data
            state.isLoading = false

        })
    }

    return {...toRefs(state),getExpenseBooks}

}
