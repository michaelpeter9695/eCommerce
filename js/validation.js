const validation = new JustValidate("#Signup");

validation
  .addField("#firstname", [
    {
      rule: "required",
    },
  ])
  .addField("#lastname", [
    {
      rule: "required",
    },
  ])
  .addField("#username", [
    {
      rule: "required",
    },
    {
      validator: (value) => () => {
        return fetch(
          "validate-username.php?username=" + encodeURIComponent(value)
        )
          .then(function (response) {
            return response.json();
          })
          .then(function (json) {
            return json.available;
          });
      },
      errorMessage: "username already taken",
    },
  ])
  .addField("#email", [
    {
      rule: "required",
    },
    {
      rule: "email",
    },
    {
      validator: (value) => () => {
        return fetch("validate-email.php?email=" + encodeURIComponent(value))
          .then(function (response) {
            return response.json();
          })
          .then(function (json) {
            return json.available;
          });
      },
      errorMessage: "email already taken",
    },
  ])
  .addField("#number", [
    {
      rule: "required",
    },
    {
      validator: (value) => () => {
        return fetch("validate-number.php?number=" + encodeURIComponent(value))
          .then(function (response) {
            return response.json();
          })
          .then(function (json) {
            return json.available;
          });
      },
      errorMessage: "number already taken",
    },
  ])

  .addField("#password", [
    {
      rule: "required",
    },
    {
      rule: "password",
    },
  ])
  .addField("#password_confirm", [
    {
      validator: (value, fields) => {
        return value === fields["#password"].elem.value;
      },
      errorMessage: "Passwords should match",
    },
  ])
  .onSuccess((event) => {
    document.getElementById("Signup").submit();
  });
