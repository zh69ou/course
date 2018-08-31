import {M_UP_LOADING,M_UP_LANDED,M_UP_LOGIN,M_UP_GETDATA,M_UP_SENDDATA,M_UP_SENDMETA,M_UP_URL,A_SENDDATE} from './sets.js'
import fetch from '../plugs/fetch.js'
const pubstore = {
	state: {
		loading: false,	// ������
		landed: false,	// �Ƿ��¼
		islogin: false,	// �Ƿ���ʾ��¼��
		senddata: {},		// ajax��������
		sendmeta: {},		// ajax����ͷ
		url: '',				// ajax���͵�ַ
		getdata: {}			// ajax����ֵ/���ݽ�����
	},
	mutations: {
		[M_UP_LOADING] (state, load) {
			state.loading = load
		},
		[M_UP_LOGIN] (state, login) {
			state.islogin = login
		},
		[M_UP_LANDED] (state, land) {
			state.landed = land
		},
		[M_UP_GETDATA] (state, data) {
			state.getdata = data
		},
		[M_UP_SENDDATA] (state, data) {
			state.senddata = data
		},
		[M_UP_SENDMETA] (state, data) {
			state.sendmeta = data
		},
		[M_UP_URL] (state, data) {
			state.url = data
		}
	},
	actions: {
		[A_SENDDATE] ({state, commit}) {
			commit(M_UP_LOADING, true)
			let data = state.senddata
			commit(M_UP_GETDATA,null)
			return fetch({
				url: state.url,
				data: data,
				crypt: true
			})
			.then(response => {
				commit(M_UP_GETDATA, JSON.parse(response.data))
				commit(M_UP_LOADING, false)
				// console.log(response.data)
			})
			.catch(error => {
				commit(M_UP_LOADING, false)
				// console.log(error)
			})
		}
	}
}

export default pubstore