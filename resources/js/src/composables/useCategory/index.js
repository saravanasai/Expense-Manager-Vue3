import { reactive, toRefs } from "vue"

import api from "../../../config"

export default function useCategory() {
    const url = "/user/category"

    const state = reactive({
        categories: {},
        isLoadingCategories: true
    })

    const getCategories = async () => {
        api.get(url).then(e => {
            state.categories = e.data.data
            state.isLoadingCategories = false
        })
    }

    return {
        ...toRefs(state),
        getCategories
    }
}
