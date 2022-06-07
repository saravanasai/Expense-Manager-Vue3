import { reactive, toRefs } from "vue"

import api from "../../../config"

export default function useExpenseBook() {
    const url = "/user/expense-book/"

    const state = reactive({
        expenseBooks: {},
        expenseBook: {},
        isLoading: true
    })

    const getExpenseBooks = async () => {
        api.get(url).then(e => {
            state.expenseBooks = e.data.data
            state.isLoading = false
        })
    }

    const addExpenseBooks = data => {
        state.isLoading = true
        return api.post(url, data)
    }

    const getExpenseBook = id => {
        state.isLoading = true
        api.get(url + id).then(e => {
            state.expenseBook = e.data.data
            state.isLoading = false
        })
    }

    const updateExpenseBook = () => {
        let data = {
            book_name: state.expenseBook.book,
            book_description: state.expenseBook.description
        }
        state.isLoading = true
        return api.put(url + state.expenseBook.id, data)
    }

    const shareExpenseBook = props => {
        let data = {
            email: props.shareToEmail
        }
        state.isLoading = true
        return api.put(url + "share/" + state.expenseBook.id, data)
    }

    const deleteExpenseBook = id => {
        state.isLoading = true
        return api.delete(url + id)
    }

    return {
        ...toRefs(state),
        getExpenseBooks,
        addExpenseBooks,
        getExpenseBook,
        updateExpenseBook,
        deleteExpenseBook,
        shareExpenseBook
    }
}
