import { WeatherCodeEnum } from '@/constants';

export interface User {
  id: number;
  name: string;
  email: string;
  created_at: string;
  is_email_verified: boolean;
}

export interface Weather {
  id: number;
  temperature: number;
  humidity: number;
  pressure: number;
  wind_direction: number;
  wind_speed: number;
  type: WeatherCodeEnum;
  forecasted_at: string;
}

export interface WeatherDay {
  forecasted_at: Date;
  min: number;
  max: number;
  items: Array<Weather>;
  type: WeatherCodeEnum;
}

export interface Location {
  id: number;
  name: string;
  slug: string;
  code: string;
  type: number;
  weather: Array<Weather> | null;
}