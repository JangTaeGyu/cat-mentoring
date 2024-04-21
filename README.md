
# Cat Mentoring API

## 작업 지시서

- [코멘토 Backend 과제](https://comento.notion.site/Backend-ee683f02ead7498c8d9fd152421af0b8)

## 개발 기간

- 2024-04-23(화) 6시 까지

## 개발 스택

- Language : PHP 8.1 or PHP : 8.2
- Framework : Laravel 9 (보안 수정 2024-02-06)
- Database : MySQL

## 라이브러리

### 로그인 폼 생성

```shell
composer require laravel/breeze --dev
```

### 소셜 로그인

```shell
composer require laravel/socialite
```

### Array 를 Object 변환

```shell
composer require netresearch/jsonmapper
```

## API 목록

```shell
GET|HEAD  api/v1/questions # 질문 목록 
POST      api/v1/questions # 질문 등록
GET|HEAD  api/v1/questions/{question} # 질문 상세보기
POST      api/v1/questions/{question}/answers # 답변 등록
DELETE    api/v1/questions/{question}/answers/{answer} # 답변 삭제
PUT       api/v1/questions/{question}/answers/{answer}/accept # 답변 채택
PUT       api/v1/questions/{question}/answers/{answer}/unaccepted # 답변 채택 취소
PUT       api/v1/signup # 회원 가입
PUT       api/v1/approve-mentor # 회원 맨토 승인
```

## 실행 하기

```shell
# 소스 다운 받기

cd cat-mentoring

# 환경 변수 파일 추가
cp .env.example .env

vi .env

# DB 접속 정보
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

# Google 소셜 가입 & 로그인 연동 정보
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=

# 테이블 생성 
php artisan migrate:refresh

# 개발 서버 실행
php artisan serve
```
