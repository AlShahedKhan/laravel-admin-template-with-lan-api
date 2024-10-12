import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '08cac8944fc51f10a17d',
    cluster: 'ap2',
    encrypted: true,
});
