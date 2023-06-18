import {FetchBackend} from "./util/FetchBackend.js";
import {UsersTable} from "./components/UsersTable.js";


async function main(){
    let usersTableDiv=document.querySelector("#table-container");

    let users = await FetchBackend.get("/api/user/all");

    let userTableElement=new UsersTable(usersTableDiv, users).render();
    usersTableDiv.insertAdjacentElement("afterbegin", userTableElement);
}

main();
