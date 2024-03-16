let CWWYA_nItemsApis = undefined

const CWWYA_onLoad_nItemsApis = () => {
  const ele = document.getElementById("page-config-CWWYA")
  const atr = ele.getAttribute("data-n-items-apis")
  if(atr && !CWWYA_nItemsApis){
    CWWYA_nItemsApis = parseInt(`${atr}`)
  }
}

const CWWYA_onAddNewApi = () => {
  CWWYA_onLoad_nItemsApis()
  
  const contentApis = document.getElementById("contentApis");
  contentApis.innerHTML += `
        ${templateAddNewApi.split("newApiID").join(CWWYA_nItemsApis)}
    `;
    CWWYA_nItemsApis++;
};

const CWWYA_onLoadAddNewApi = () => {
  const addNewApi = document.getElementById("addNewApi");
  addNewApi.addEventListener("click", (e) => {
    e.preventDefault();
    CWWYA_onAddNewApi();
  });
};

const CWWYA_onDeleteApi = (submit) => {
    if(confirm("Are you sure?")){
        submit.click();
    }
};

const CWWYA_onLoadDeleteApi = () => {
  const btnsDeleteSubmit = document.querySelectorAll(".delete-api-submit");
  const btnsDelete = document.querySelectorAll(".delete-api");
  btnsDelete.forEach((btn, i) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      CWWYA_onDeleteApi(btnsDeleteSubmit[i]);
    });
  });
};

const CWWYA_onLoadPageConfig = () => {
  CWWYA_onLoadAddNewApi();
  CWWYA_onLoadDeleteApi();
};

window.addEventListener("load", CWWYA_onLoadPageConfig);
