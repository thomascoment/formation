import axios from "axios";

export async function getJWToken(username, password) {
    const options = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            username: username,
            password: password
        })
    };
    const response = await fetch('http://app-com-together.local/wp-json/jwt-auth/v1/token', options)
    const data = await response.json();
    return data.token


    /*
    if(!response.ok) {
        throw new Error(`Erreur HTTP, statut : ${response.status}`);
    }
    const data = await response.json();
    console.log(data.token)
    return data.token;
} catch (error) {
    console.error('Erreur lors de la récupération du token :', err);
    throw error;
    */
}

export async function login() {
    const username = username;
    const password = password
    try {
        const token = await getJWToken(username, password);
        console.log('Token JWT:', token);
        sessionStorage.setItem('jwtToken', token);
        alert('Connexion résussie !');
    } catch (error) {
        console.error('Echec de la connexion. Vérifiez vos identifiants');
    }
}


export async function createPost(token, title, content) {
    if (!sessionStorage.getItem('jwtToken')) {
        console.log("Pas de Token")
    };
    token = sessionStorage.getItem('jwtToken')
    const response = await axios.post(
        'http://app-com-together.local/wp-json/wp/v2/posts',

        {
            title: 'title',
            content: content,
            status: 'publish',
        },
        {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        }
    );
    return response.data
}

