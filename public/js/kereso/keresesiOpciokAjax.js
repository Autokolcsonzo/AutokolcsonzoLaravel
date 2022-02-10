class MyAjax {
    constructor() {}
  
    getAdat(apiVegpont, tomb, myCallback) {
      tomb.splice(0, tomb.length);
      $.ajax({
        url: apiVegpont,
        type: "GET",
        success: function (result) {
          result.forEach((value) => {
            tomb.push(value);
          });
          myCallback(tomb);
        },
      });
    }
  }
  