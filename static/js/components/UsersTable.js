export class UsersTable{
    #parentElement;
    #users;

    constructor(parentElement, users) {
        this.#parentElement=parentElement;
        this.#users=users;
    }

    render(){
        const usersTable=document.createElement("table");
        this.#parentElement.insertAdjacentElement("afterbegin", usersTable);

        const thead = usersTable.createTHead();
        const trHead=thead.insertRow();

        const thUserId = trHead.insertCell();
        thUserId.innerText="iD";
        const thUserName = trHead.insertCell();
        thUserName.innerText="Username";
        const thRole = trHead.insertCell();
        thRole.innerText="Role";
        const tBody = usersTable.createTBody();

        for (let user of this.#users){
            let tr = tBody.insertRow();

            let tdUseId=tr.insertCell();
            tdUseId.innerText=user.id;
            tdUseId.classList.add("user-id");

            let tdUsername = tr.insertCell();
            tdUsername.innerText=user.username;

            let tdRole = tr.insertCell();
            tdRole.innerText=user.role;
        }

        return usersTable;
    }
}
