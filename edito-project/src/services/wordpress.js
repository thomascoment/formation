import axios from "axios";

const API_URL = 'http://app-com-together.local/wp-json/wp/v2';

export const getPages = async () => {
    try {
        const response = await axios.get(`${API_URL}/pages`,{
        params: {
            per_page: 100
        }});
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error("Erreur lors de la récupération des pages :", error);
        return [];
    }
};