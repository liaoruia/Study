/**
 * Created by daxia on 2017/7/17.
 */
export function request(settingsCallback, doneCallback) {
    let xhr;
    return function(...args)  {
        return new Promise((resolve, reject) => {
            if (xhr && xhr.state() === 'pending') {
                xhr.abort();
            }

            let settings = settingsCallback(...args);
            xhr = $.ajax(settings).done(function(resp) {
                doneCallback(resp, resolve, reject);
            }).fail((jqxhr, textstatus, errorthrown) => {
                if (textstatus !== 'abort') {
                    reject('服务器错误，请稍候再试');
                }
            });
        });
    };
}
