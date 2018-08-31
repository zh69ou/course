import axios from 'axios'
import qs from 'qs'
import AES from 'crypto-js/aes'

export function fetch (opts) {
	return new Promise((resolve, reject) => {
		// console.log(opts.data)
		let defconfig = {
			method:opts.method ? opts.method : 'POST',
			url:opts.url,
			// responseType:'JSON',
			headers: opts.method=='get'?{
        'X-Requested-With': 'XMLHttpRequest',
        "Accept": "application/json",
        "Content-Type": "application/json; charset=UTF-8"
      }:{
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
			params:opts.data,
			data:opts.data,
			// 发送数据前处理数据
			transformRequest: [function (data) {
				let meta = document.getElementsByTagName('meta')
				for (var i=0,len=meta.length; i<len; i++)
				{
					if(meta[i]['name']&&meta[i]['name'].length==32)
					{
						data[meta[i]['name']]=meta[i]['content']
					}
				}
				// if (opts.crypt) {
				// 	data['ms'] = AES.encrypt(JSON.stringify(data), '')
				// }
				return qs.stringify(data)
			}],
			// // 接受返回数据处理
			transformResponse: [function(data){
				// console.log(data)
				// if (opts.crypt) {
				// 	return JSON.parse(AES.decrypt(data.redata.toString(), ''))
				// } else {
					return data
				// }
			}],
			// xsrfCookieName: 'XSRF-TOKEN',
			// xsrfHeaderName: 'X-XSRF-TOKEN',
			timeout: 30000
		}
		if(defconfig.method=='get'){
      delete defconfig.data
    }else{
      delete defconfig.params
    }
		const instance = axios(defconfig).then(response => {
			resolve(response)
		}).catch(error => {
			// console.log(error)
			// reject(error)
		})
	})
}

export default fetch