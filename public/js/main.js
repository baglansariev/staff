let main = {
    alert: {
        show(message, status, redirect = false, page_reload = false)
        {
            $('.alert-message p').text(message);
            $('.alert-status').addClass(status);

            let layoutAlert =  $('.layout-alert');
            let alertIcon = $('.alert-icon');
            let alertButtonsDiv = $('.alert-buttons');
            var alertButton = '<button type="button" class="btn btn-lg btn-primary" onclick="main.alert.close(\'' + status + '\')">OK</button>';

            if (page_reload)
            {
                alertButton = '<button type="button" class="btn btn-lg btn-primary" onclick="location.reload()">OK</button>';
            }
            else if (redirect)
            {
                alertButton = '<button type="button" class="btn btn-lg btn-primary" onclick="location.href=\'' + redirect + '\'">OK</button>';
            }

            switch (status)
            {
                case 'success':
                    alertIcon.html('<i class="fas fa-check-circle"></i>');
                    alertButtonsDiv.html(alertButton);
                    break;

                case 'danger':
                    alertIcon.html('<i class="fas fa-times-circle"></i>');
                    alertButtonsDiv.html(alertButton);
                    break;

                case 'warning':
                    alertIcon.html('<i class="fas fa-exclamation-circle"></i>');
                    alertButtonsDiv.html(alertButton);
                    break;

                default:
                    alert('There is no such status');
                    break;
            }

            layoutAlert.fadeIn();
        },
        close(status)
        {
            $('.layout-alert').fadeOut();
            $('.alert-status').removeClass(status);
        }
    },
    desktopMenu: {
        toggle(toggler)
        {
            if ($(toggler).hasClass('shown'))
            {
                this.hide(toggler);
            }
            else
            {
                this.show(toggler)
            }
        },
        show(toggler)
        {
            $(toggler).html('<i class="fas fa-ellipsis-v"></i>');
            $(toggler).addClass('shown');
            $('.column-left').animate({
                width: 20 + '%',
                minWidth: 380 + 'px',
            });
            $('.column-left .main-logo .shown').fadeIn();
            $('.column-left .main-logo .hidden').fadeOut();
            $('.main-menu ul li a span').fadeIn();
            $('.panel').animate({
                width: 80 + '%'
            });
        },
        hide(toggler)
        {
            $(toggler).html('<i class="fas fa-bars"></i>');
            $(toggler).removeClass('shown');
            $('.column-left').animate({
                width: 5 + '%',
                minWidth: 90 + 'px',
            });
            $('.column-left .main-logo .shown').fadeOut(100);
            $('.column-left .main-logo .hidden').fadeIn(100);
            $('.main-menu ul li a span').fadeOut(100);
            $('.panel').animate({
                width: 95 + '%'
            });
        }
    }
};