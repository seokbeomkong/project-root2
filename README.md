# 진단 결과 데이터 관리 시스템

이 프로젝트는 PHP와 MySQL을 활용하여 진단 결과를 입력, 조회, 수정, 삭제할 수 있는 CRUD 애플리케이션입니다.  
Bootstrap을 사용해 간단하고 직관적인 UI를 제공하며, Prepared Statement와 XSS 방지 처리를 통해 보안을 강화하였습니다.

## 주요 기능
- **입력(Create):** 사용자 이름과 진단 결과를 입력하여 새로운 레코드를 추가합니다.
- **조회(Read):** 저장된 진단 결과를 최신순으로 조회할 수 있습니다.
- **수정(Update):** 기존의 진단 결과를 선택하여 수정할 수 있습니다.
- **삭제(Delete):** 불필요한 진단 결과를 삭제할 수 있습니다.

## 설치 및 실행 방법 (XAMPP 기준)
1. **필수 요구사항**
   - PHP 7 이상
   - MySQL
   - XAMPP (또는 유사한 통합 개발 환경)

2. **프로젝트 다운로드**
   - GitHub Repository에서 프로젝트를 클론하거나 압축 파일로 다운로드합니다.
   - 예시: `git clone https://github.com/username/repository.git`

3. **데이터베이스 설정**
   - MySQL에 접속하여 아래 쿼리를 실행해 데이터베이스 및 테이블을 생성합니다.
   
   ```sql
   CREATE DATABASE IF NOT EXISTS diagnosis_db;
   USE diagnosis_db;

   CREATE TABLE IF NOT EXISTS diagnosis (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    diagnosis TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   CREATE TABLE diagnosis_results (
       id INT AUTO_INCREMENT PRIMARY KEY,
       user_name VARCHAR(100) NOT NULL,
       diagnosis_result TEXT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );