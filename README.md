
# Cat Mentoring API

> 과제로 진행한 프로젝트이며 소셜 가입 후 고양이 질문 답변을 하는 서비스 입니다.

## 개발 스택

- Language : PHP 8.1 or PHP : 8.2
- Framework : Laravel 9 (보안 수정 2024-02-06)
- Database : MySQL

## 회원 가입 Flow

![Cat Mentoring 소셜 가입 Flow](/resources/images/Cat_Mentoring_소셜_가입_Flow.drawio.png)

## 프로젝트 구조

```text
modules
├── Api/
│   ├── V1/
│   │   ├── Controllers/
│   │   │   ├── AnswerController.php
│   │   │   ├── GoogleAuthController.php
│   │   │   ├── QuestionController.php
│   │   │   ├── Requests/
│   │   │   │   ├── ApproveMentorRequest.php
│   │   │   │   ├── InputAnswerRequest.php
│   │   │   │   ├── InputQuestionRequest.php
│   │   │   │   ├── SearchQuestionRequest.php
│   │   │   │   └── SignupRequest.php
│   │   │   ├── Resources/
│   │   │   │   ├── AnswerResource.php
│   │   │   │   ├── CreatedResource.php
│   │   │   │   ├── QuestionCollection.php
│   │   │   │   ├── QuestionDetailsResource.php
│   │   │   │   ├── QuestionResource.php
│   │   │   │   └── UserResource.php
│   │   │   └── UserController.php
│   │   ├── Repositories/
│   │   │   ├── AnswerRepository.php
│   │   │   ├── AnswerRepositoryInterface.php
│   │   │   ├── Models/
│   │   │   │   ├── Answer.php
│   │   │   │   ├── Enums/
│   │   │   │   ├── Question.php
│   │   │   │   └── User.php
│   │   │   ├── QuestionRepository.php
│   │   │   ├── QuestionRepositoryInterface.php
│   │   │   ├── UserRepository.php
│   │   │   └── UserRepositoryInterface.php
│   │   └── Services/
│   │       ├── AnswerService.php
│   │       ├── Data/
│   │       │   ├── ApproveMentorData.php
│   │       │   ├── InputAnswerData.php
│   │       │   ├── InputQuestionData.php
│   │       │   ├── SearchQuestionData.php
│   │       │   └── SignupData.php
│   │       ├── Exceptions/
│   │       │   ├── AcceptedAnswerException.php
│   │       │   ├── AlreadyRegisteredUserException.php
│   │       │   ├── AnswerRegistrationCountLimitException.php
│   │       │   ├── AnswerToQuestionException.php
│   │       │   ├── NotAdminRole.php
│   │       │   ├── NotAuthorException.php
│   │       │   ├── NotFoundUserException.php
│   │       │   ├── NotMentorRole.php
│   │       │   └── UnsignupedUserException.php
│   │       ├── GoogleAuthService.php
│   │       ├── QuestionService.php
│   │       └── UserService.php
│   └── router.php
├── Core/
│   ├── Data/
│   │   └── AbstractData.php
│   ├── Exceptions/
│   │   ├── HttpException.php
│   │   └── Renderers/
│   │       ├── AuthenticationExceptionRenderer.php
│   │       ├── AuthorizationExceptionRenderer.php
│   │       ├── ExceptionRenderer.php
│   │       ├── NotFoundHttpExceptionRenderer.php
│   │       ├── Renderable.php
│   │       └── ValidationExceptionRenderer.php
│   ├── Repositories/
│   │   ├── AbstractRepository.php
│   │   └── RepositoryInterface.php
│   ├── Requests/
│   │   └── DataTrait.php
│   └── Resources/
│       └── PaginationTrait.php
├── Middleware/
│   ├── CheckSignuped.php
│   └── JsonContentTypeHeader.php
└── Support/
    └── Helper.php

```

## API

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

## 실행

```shell
# 소스 다운 받기
git clone https://github.com/JangTaeGyu/cat-mentoring.git

# 프로젝트 폴더 접근
cd cat-mentoring

# 설치
composer install
# composer dump-autoload

# 환경 변수 파일 복사
cp .env.example .env

vi .env

-----------------------------------------
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
-----------------------------------------

# 테이블 생성 
php artisan migrate:refresh

# 개발 서버 실행
php artisan serve
```
