<script setup lang="ts">
import { WeatherCodeEnum } from '@/constants';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

defineProps<{ type: WeatherCodeEnum | string }>();

const iconsMap = {
	[WeatherCodeEnum.CLEAR_SKY]: 'sun',
	[WeatherCodeEnum.MAINLY_CLEAR]: 'cloud-sun',
	[WeatherCodeEnum.PARTLY_CLOUDY]: 'cloud-sun',
	[WeatherCodeEnum.OVERCAST]: 'cloud',
	[WeatherCodeEnum.FOG]: 'smog',
	[WeatherCodeEnum.RIME_FOG]: 'smog',
	[WeatherCodeEnum.DRIZZLE_LIGHT]: 'cloud-rain',
	[WeatherCodeEnum.DRIZZLE_MODERATE]: 'cloud-rain',
	[WeatherCodeEnum.DRIZZLE_DENSE]: 'cloud-rain',
	[WeatherCodeEnum.FREEZING_DRIZZLE_LIGHT]: 'cloud-rain',
	[WeatherCodeEnum.FREEZING_DRIZZLE_DENSE]: 'cloud-rain',
	[WeatherCodeEnum.RAIN_SLIGHT]: 'cloud-showers-heavy',
	[WeatherCodeEnum.RAIN_MODERATE]: 'cloud-showers-heavy',
	[WeatherCodeEnum.RAIN_HEAVY]: 'cloud-showers-heavy',
	[WeatherCodeEnum.SNOW_SLIGHT]: 'snowflake',
	[WeatherCodeEnum.SNOW_MODERATE]: 'snowflake',
	[WeatherCodeEnum.SNOW_HEAVY]: 'snowflake',
	[WeatherCodeEnum.SNOW_GRAINS]: 'snowflake',
	[WeatherCodeEnum.RAIN_SHOWERS_SLIGHT]: 'cloud-showers-heavy',
	[WeatherCodeEnum.RAIN_SHOWERS_MODERATE]: 'cloud-showers-heavy',
	[WeatherCodeEnum.RAIN_SHOWERS_VIOLENT]: 'cloud-showers-heavy',
	[WeatherCodeEnum.SNOW_SHOWERS_SLIGHT]: 'snowflake',
	[WeatherCodeEnum.SNOW_SHOWERS_HEAVY]: 'snowflake',
	[WeatherCodeEnum.THUNDERSTORM]: 'bolt',
	[WeatherCodeEnum.THUNDERSTORM_WITH_HAIL_SLIGHT]: 'bolt',
	[WeatherCodeEnum.THUNDERSTORM_WITH_HAIL_HEAVY]: 'bolt'
};
</script>

<template>
	<font-awesome-icon :icon="iconsMap[type]" />
</template>
