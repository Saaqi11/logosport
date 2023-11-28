console.log('Bootstrap.js loaded');
import Echo from 'laravel-echo';

import Pusher from 'pusher-js'; // Import using ESM syntax

window.Pusher = Pusher;

const { MIX_PUSHER_APP_KEY, MIX_PUSHER_APP_CLUSTER } = import.meta.env;
Pusher.logToConsole = true;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "ef4cea0b953e4fe8a357",
    cluster: "mt1",
    encrypted: true,
});
