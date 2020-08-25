var RestClient = {
  get: function (url, success, error) {
    $.ajax({
      url: "rest/" + url,
      type: "GET",
      beforeSend: function (xhr) {
        xhr.setRequestHeader(
          "authorization",
          "Bearer " + localStorage.getItem("user_token")
        );
      },
      success: function (data) {
        if (success) success(data);
      },
      error: function (data) {
        if (error) error(data);
      },
    });
  },

  post: function (url, data, success, error) {
    $.ajax({
      url: "rest/" + url,
      type: "POST",
      data: data,
      beforeSend: function (xhr) {
        xhr.setRequestHeader(
          "authorization",
          "Bearer " + localStorage.getItem("user_token")
        );
      },
      success: function (data) {
        if (success) success(data);
      },
      error: function (data) {
        if (error) error(data);
      },
    });
  },

  put: function (url, data, success, error) {
    $.ajax({
      url: "rest/" + url,
      type: "PUT",
      data: data,
      beforeSend: function (xhr) {
        xhr.setRequestHeader(
          "authorization",
          "Bearer " + localStorage.getItem("user_token")
        );
      },
    })
      .done(function (data) {
        if (success) success(data);
      })
      .error(function (data) {
        if (error) {
          error(data);
        }
      });
  },

  patch: function (url, data, success, error) {
    $.ajax({
      url: "rest/" + url,
      type: "PATCH",
      data: data,
      beforeSend: function (xhr) {
        xhr.setRequestHeader(
          "authorization",
          "Bearer " + localStorage.getItem("user_token")
        );
      },
      success: function (data) {
        if (success) success(data);
      },
      error: function (data) {
        if (error) error(data);
      },
    });
  },

  delete: function (url, data, success, error) {
    $.ajax({
      url: "rest/" + url,
      type: "DELETE",
      data: data,
      beforeSend: function (xhr) {
        xhr.setRequestHeader(
          "authorization",
          "Bearer " + localStorage.getItem("user_token")
        );
      },
      success: function (data) {
        if (success) success(data);
      },
      error: function (data) {
        if (error) error(data);
      },
    });
  },
};
