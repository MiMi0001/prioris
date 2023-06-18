export class FetchBackend{
    static #baseUrl="http://mimi.prioris.com";
    static async get(url){
        let fullUrl = FetchBackend.#baseUrl+url;
        let response = await fetch (fullUrl);
        return response.json();
    }
}
