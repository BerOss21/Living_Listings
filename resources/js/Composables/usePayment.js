import {isRef,computed} from 'vue';

export const payment=(total,duration)=>{
    const monthlyPayment=computed(()=>{
        const principle = isRef(total)?total.value:total;
        const numberOfPaymentMonths = (isRef(duration)?duration.value:duration)* 12
        return principle / numberOfPaymentMonths ;
    })

    const totalPayed=computed(()=>{
        return monthlyPayment.value * (isRef(duration)?duration.value:duration) * 12
    })

    return {
        monthlyPayment,
        totalPayed
    }
}