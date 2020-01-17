let Form = {
    employee: {
        create(form)
        {
            let data = $(form).serialize();
            $.ajax({
                data: data,
                url: "/employee/add/new",
                type: "POST",
                dataType: "JSON",
                success: function (ans) {
                    if (ans.success)
                    {
                        main.alert.show(ans.success, 'success', '/employee');
                    }
                    else
                    {
                        main.alert.show(ans.error, 'danger');
                    }
                },
                error: function (ans) {
                    console.log(ans);
                }
            })
        },
        update(form, employee_id)
        {
            let data = $(form).serialize();
            data += '&employee_id=' + employee_id;
            $.ajax({
                data: data,
                url: "/employee/update",
                type: "POST",
                dataType: "JSON",
                success: function (ans) {
                    if (ans.success)
                    {
                        main.alert.show(ans.success, 'success', '/employee');
                    }
                    else
                    {
                        main.alert.show(ans.error, 'danger');
                    }
                },
                error: function (ans) {
                    console.log(ans);
                }
            })
        },
        delete(employee_id, token)
        {
            $.ajax({
                data: {
                    del: employee_id,
                    _token: token,
                },
                url: "/employee/delete",
                type: "POST",
                dataType: "JSON",
                success: function (ans) {
                    if (ans.success)
                    {
                        main.alert.show(ans.success, 'success', false, true);
                    }
                    else
                    {
                        main.alert.show(ans.error, 'danger');
                    }
                },
                error: function (ans) {
                    console.log(ans);
                }
            })
        },
    },
    departments: {
        create(form)
        {
            let data = $(form).serialize();

            $.ajax({
                data: data,
                url: "/department/add/new",
                type: "post",
                dataType: "JSON",
                success: function (ans) {
                    if (ans.success)
                    {
                        main.alert.show(ans.success, 'success', '/departments');
                    }
                    else
                    {
                        main.alert.show(ans.error, 'danger');
                    }
                },
                error: function (ans) {
                    console.log(ans);
                }
            })
        },
        update(form, department_id)
        {
            let data = $(form).serialize();
            data += '&department_id=' + department_id;

            $.ajax({
                data: data,
                url: "/department/update",
                type: "POST",
                dataType: "JSON",
                success: function (ans) {
                    if (ans.success)
                    {
                        main.alert.show(ans.success, 'success', '/departments');
                    }
                    else
                    {
                        main.alert.show(ans.error, 'danger');
                    }
                },
                error: function (ans) {
                    console.log(ans);
                }
            })
        },
        delete(department_id, token)
        {
            $.ajax({
                data: {
                    del: department_id,
                    _token: token,
                },
                url: "/department/delete",
                type: "POST",
                dataType: "JSON",
                success: function (ans) {
                    if (ans.success)
                    {
                        main.alert.show(ans.success, 'success', false, true);
                    }
                    else
                    {
                        main.alert.show(ans.error, 'danger');
                    }
                },
                error: function (ans) {
                    console.log(ans);
                }
            })
        },
    },
};