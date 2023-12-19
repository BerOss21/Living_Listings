import {isRef,computed} from 'vue';

export const payment=(total,interset_rate,duration)=>{
    const monthlyPayment=computed(()=>{
        const principle = isRef(total)?total.value:total;
        const monthlyInterest = (isRef(interset_rate)?interset_rate.value:interset_rate) / 100 / 12
        const numberOfPaymentMonths = (isRef(duration)?duration.value:duration)* 12
        return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
    })

    const totalPayed=computed(()=>{
        return monthlyPayment.value * (isRef(duration)?duration.value:duration) * 12
    })

    const interestPayed=computed(()=>{
        return totalPayed.value - (isRef(total)?total.value:total)
    })

    return {
        monthlyPayment,
        totalPayed,
        interestPayed
    }
}