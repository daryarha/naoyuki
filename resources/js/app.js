window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Pusher = require('pusher-js');
require('./bootstrap');

import Echo from "laravel-echo";
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'fee0703040dfc1a6d926',
    cluster: 'ap1',
    forceTLS: true
  });


  var notifications = [];
  const NOTIFICATION_TYPES = {
      "cashflow_added_transaction": 'App\\Notifications\\CashflowCreated',
      "cashflow_changed_transaction": 'App\\Notifications\\CashflowUpdated',
      "cashflow_deleted_transaction": 'App\\Notifications\\CashflowDestroyed',
      "target_added": 'App\\Notifications\\TargetCreated'
  };


$(document).ready(function(){
  if(Laravel.userId) {
	    $.get(`/notifications`, function (data) {
	        addNotifications(data, "#notifications");
	    });
      //...
      window.Echo.private(`App.User.${Laravel.userId}`)
          .notification((notification) => {
            console.log(notification);
              addNotifications([notification], '#notifications');
          });
  }
});

function addNotifications(newNotifications, target) {
      notifications = _.concat(notifications, newNotifications);
      // show only last 5 notifications
      notifications.slice(0, 5);
      showNotifications(notifications, target);
  }

  function showNotifications(notifications, target) {
      if(notifications.length) {
          var htmlElements = notifications.map(function (notification) {
              return makeNotification(notification);
          });
          $(target + 'Menu').html(htmlElements.join(''));
          $(target).addClass('has-notifications')
      } else {
          $(target + 'Menu').html('<li class="dropdown-item">No notifications</li>');
          $(target).removeClass('has-notifications');
      }
  }

  function makeNotification(notification) {
      var to = routeNotification(notification);
      var notificationText = makeNotificationText(notification);
      return `<a class="dropdown-item" href="${to}">${notificationText}</a>`;
  }

  // get the notification route based on it's type
  function routeNotification(notification) {
      var to = '?read=' + notification.id;
      if(notification.type === NOTIFICATION_TYPES.cashflowCreate || notification.type === NOTIFICATION_TYPES.cashflowUpdate || notification.type === NOTIFICATION_TYPES.cashflowDestroy) {
          to = 'cashflow' + to;
      }
      return '/' + to;
  }

  // get the notification text based on it's type
  function makeNotificationText(notification) {
      var text = '';
      const foundKeys = Object.keys(NOTIFICATION_TYPES).filter(function(key) {
          return NOTIFICATION_TYPES[key] == notification.type;
      })
      console.log(foundKeys);
      const event = foundKeys[0].split("_");
      const table = event[0];
      const task = event[1];
      const name_column = event[2];
      // if(notification.type === NOTIFICATION_TYPES.cashflowCreate) {
      text += templateNotification(notification, task, table, name_column);
      return text;
  }

  function templateNotification(notification, task="", table="", name_column=""){
    const name = notification.data.name;
    const user = notification.data.user;
    if (task=="added") {      
      return `${user} <b>${task}</b> a new ${table} ${name_column} named <b>"${name}"</b>`;
    }else{
      return `${user} <b>${task}</b> a ${table} ${name_column} named <b>"${name}"</b>`;
    }
  }